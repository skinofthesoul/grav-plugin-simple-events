<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Grav;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class SimpleEventsPlugin
 * @package Grav\Plugin
 */
class SimpleEventsPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onTwigTemplatePaths'  => ['onTwigTemplatePaths', 0],
            'onGetPageTemplates'   => ['onGetPageTemplates', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main event we are interested in
        $this->enable([
            'onTwigInitialized' => ['onTwigInitialized', 0]
        ]);
    }

    /**
     * Add blueprint directory to page templates.
     */
    public function onGetPageTemplates(Event $event)
    {
        $types = $event->types;
        $locator = Grav::instance()['locator'];
        $types->scanBlueprints($locator->findResource('plugin://' . $this->name . '/blueprints'));
        $types->scanTemplates($locator->findResource('plugin://' . $this->name . '/templates'));
    }

    /**
     * Add templates to twig paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Register the new Twig filter.
     */
    public function onTwigInitialized(Event $e)
    {
        $this->grav['twig']->twig()->addFilter(
            new \Twig_SimpleFilter('linked', [$this, 'linkIt'])
        );
        $this->grav['twig']->twig()->addFunction(
            new \Twig_SimpleFunction('linkit', [$this, 'linkIt'])
        );
    }

    /**
     * Turn part of a string in [] into a link.
     */
    public function linkIt($string, $url)
    {
        if (substr($url, 0, 4) == "http") {
          $addr = $url;
        } else {
          $addr = $this->grav['base_url'].'/'.$url;
        }
        if(preg_match('/(.*)\[(.*)\](.*)/', $string, $matches)) {
          $linked = $matches[1].'<a href="'.$addr.'/'.$url.'">'.$matches[2].'</a>'.$matches[3];
        } else {
          $linked = '<a href="'.$addr.'">'.$string.'</a>';
        }
        return $linked;
    }
}
