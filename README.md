# Simple Events Plugin

The **Simple Events** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav). It lets you add a simple list of events to your site.

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

Once the plugin is enabled, you have two extra template options: `Events` and `Event`. Create a new page that you want to display your events list on, and give it the template `Events`. Then create child pages with the template `Event`, and they will automatically be listed on the parent page.

### Changing the appearance
You can (and probably want to) modify the appearance of the list by copying
`user/plugins/simple-events/templates/events.html.twig` to `[theme folder]/templates/events.html.twig`, and then making any changes in that copy. I have included some code to help with making the dates multilingual, if you can't make something work, feel free to create am issue for the plugin!

### Optional fields: end dates and links
If you just want a very simple list of events, the end date and link fields of the `Event` page type are completely optional.

If you wish to be able to link your event text or a part of it to another page or another website via Admin, make a list of available links under the plugin's configuration options. You can then put part of your event text in square brackets [] and select what you wish to link this to. (This is an option I made for my clients, if you can create links in all the regular ways, you will likely not need this.)

## Credits

This plugin was initially sponsored by a German nonprofit organisation. As soon as the English version of their website is online, I shall link them here!

## To Do

- [ ] add a simple way to create new events in Admin
- [ ] restructure code into Eventslist class
- [ ] add option to automatically delete past events
- [ ] support for categories in events template
- [ ] support for types in events template
