# Simple Events Plugin

The **Simple Events** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav). It lets you add a simple list of events to your site. If you'd like something more advanced, check out the [Events plugin](https://github.com/pikim/grav-plugin-events) which has a calendar, geolocation, options for repeating events and more. This plugin really is for a simple list of events with no extra pages for them, and all added manually.

## Installation

Installing the Simple Events plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install simple-events

This will install the Simple Events plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/simple-events`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `simple-events`. You can find these files on [GitHub](https://github.com/skinofthesoul/grav-plugin-simple-events) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/simple-events

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/simple-events/simple-events.yaml` to `user/config/plugins/simple-events.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
routes: null
delete_old: false # enable to delete past events automatically
unpublish_day: start
unpublish_time: '00:00'
use_location: false # shows an extra text field in admin for use in templates
use_links: false # turn on options in admin to add a link to (part of) the title
link_options:
  - PLUGIN_SIMPLE_EVENTS.NONE
use_regions: false # enable to group events in the list by regions
regions: null
# see below on how to configure links and regions
```

Note that if you use the Admin Plugin, a file with your configuration named simple-events.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

Once the plugin is enabled, you have two extra template options: `Events` and `Event`. Create a new page that you want to display your events list on, and give it the template `Events`. Then create child pages with the template `Event`, define a collection in the frontmatter of the parent page and they will automatically be listed on the parent page.

A simple frontmatter collection example:
``` yaml
content:
    items: '@self.children'
    order:
        by: header.start
        dir: asc
    filter:
      published: true
      type: 'event'
```

Note that if you use the Admin plugin, you will find the ordering options under the Events tab of that page, and the collection will be created for you upon saving.

### Changing the appearance
You can (and probably want to) modify the appearance of the list by copying
`user/plugins/simple-events/templates/events.html.twig` to `[theme folder]/templates/events.html.twig`, and then making any changes in that copy. I have included some code to help with making the dates multilingual, if you can't make something work, feel free to create an issue for the plugin!

### Optional fields: end dates, regions, location and links
If you just want a very simple list of events, the end date, regions, location and link fields of the `Event` page type are completely optional. If you would like to use any of these, turn them on in the plugin options (see above). The location field is really just a text field that you can use for any information you'd like to style differently in your template, it does not have to be a location (but this is likely to see a lot of use). For links and regions, additional configuration is needed.

### Configuring links
If you wish to be able to link your event text or a part of it to another page or another website, make a list of available links under the plugin's configuration options or directly in the config file like so:

``` yaml
link_options:
  0: '- nothing -'
  'path/to/page': 'Example'
  'http://www.example.com': 'External example'
```

You can then put part of your event text in square brackets [] and select what you wish to link this to. (This is an option I made for my clients, if you can create links in all the regular ways, you will likely not need this.)

### Configuring regions
You can sort your events into regions if you like: just create a list of regions in the plugin settings and enable the regions (in Admin), or put an array into your `user/config/plugins/simple-events.yaml` like so:

``` yaml
regions:
  london: 'London area'
  paris: 'Paris and surroundings'
  germany: 'Somewhere in the backwaters of Germany'
use_regions: true
```

Then add one of these to each of your events, either via the Admin interface or by putting `region: paris` or similar in the event page frontmatter. Whatever you have put as the region's name will appear as a headline in between your list of events, and they will be sorted by how you sorted that list of regions.

### List of events as a block somewhere
If you'd like to put a list of events as part of a page somewhere, do the following:
- add a collection of the events you'd like to list to that page's frontmatter
- then put `{% include 'partials/eventslist.html.twig' %}` wherever you would like the list to appear
- set `process: twig: true` for that page (in the Advanced tab in Admin)
- do any customisations in a copy of that file and put that in your theme's `templates/partials` folder

You can also add taxonomy tags to your events and then use them in the page collection as a filter, for example if you have different types of events.

## Credits

This plugin was initially sponsored by a German nonprofit organisation. As soon as the English version of their website is online, I shall link them here!

I would also like to thank @pamtbaau, whose expertise has greatly contributed to this plugin.

## To Do

- [x] add option to delete past events (or do it automatically)
- [x] make use of Grav's built-in unpublish_date field
- [x] support for categories in events template
- [x] support for types in events template
