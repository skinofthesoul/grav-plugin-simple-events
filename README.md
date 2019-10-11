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

### Changing the appearance
You can (and probably want to) modify the appearance of the list by copying
`user/plugins/simple-events/templates/events.html.twig` to `[theme folder]/templates/events.html.twig`, and then making any changes in that copy. I have included some code to help with making the dates multilingual, if you can't make something work, feel free to create am issue for the plugin!

### Optional fields: end dates and links
If you just want a very simple list of events, the end date and link fields of the `Event` page type are completely optional.

If you wish to be able to link your event text or a part of it to another page or another website via Admin, make a list of available links under the plugin's configuration options or in the config file like so:

``` yaml
link_options:
  0: '- nothing -'
  'path/to/page': 'Example'
  'http://www.example.com': 'External example'
```

You can then put part of your event text in square brackets [] and select what you wish to link this to. (This is an option I made for my clients, if you can create links in all the regular ways, you will likely not need this.)

### More options
You can sort your events into regions if you like: just create a list of regions in the plugin settings and enable the regions (if you use the Admin plugin), or put an array into your `user/config/plugins/simple-events.yaml` like so:

``` yaml
regions:
  london: 'London Area'
  paris: 'Paris and surroundings'
  germany: 'Somewhere in the backwaters of Germany'
use_regions: true
```

Then select add one of these to each of your events. Whatever you have put as the region's name will appear as a headline in between your list of events, and they will be sorted by how you sorted that list of regions.

### List of events as a block somewhere
If you'd like to put a list of events as part of a page somewhere, do the following:
- add a collection to that page of the events you'd like to list
- then put `{% include 'partials/eventslist.html.twig' %}` wherever you would like the list to appear
- do any customisations in a copy of that file and put that in your theme's `templates/partials` folder

You can also add taxonomy tags to your events and then use them in the page collection as a filter, for example if you have different types of events.

## Credits

This plugin was initially sponsored by a German nonprofit organisation. As soon as the English version of their website is online, I shall link them here!

## To Do

- [ ] add option to delete past events (or do it automatically)
- [ ] maybe add a simpler way to create new events in Admin
- [x] support for categories in events template
- [x] support for types in events template
