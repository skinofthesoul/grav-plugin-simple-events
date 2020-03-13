# v1.3.2
##  03/13/2020
1. [](#bugfix)
    * fixed blueprint default to correct sorting by date
    * fixed typo in `eventslist.html.twig`

# v1.3.1
##  02/26/2020
1. [](#bugfix)
    * automatically restructure every event's frontmatter to fit the new format

# v1.3
##  02/24/2020
1. [](#new)
    * added option to delete past events automatically
2. [](#improved)
    * Admin will now create a page collection for you upon saving an `Events` page
    * extra `Events` tab with sorting settings for the collection    
    * updated README file

# v1.2.1
##  01/27/2020
1. [](#bugfix)
    * fixed the code to make it fully usable again, and established a developing branch for learning by trial and error – my apologies to everyone who had problems with the plugin in the last weeks!

# v1.2
##  12/24/2019

1. [](#improved)
    * both links and regions are now fully optional, meaning that if you disable them in the plugin settings, you won't see those fields in the admin interface
    * updated README file
2. [](#new)
    * added an optional location field for more styling options in your templates
    * added an option to automatically delete past events
3.[](#bugfix)
    * fixed a buggy if clause in `events.html.twig`

# v1.1.3
##  11/04/2019

1. [](#bugfix)
    * corrections in changelog for last version number

# v1.1.2
##  11/04/2019

1. [](#improved)
    * changed templates to list future events only
2. [](#bugfix)
    * don't link events if no url is passed to the function


# v1.1.1
##  10/11/2019

1. [](#improved)
    * changed Admin icon

# v1.1.0
##  10/11/2019

1. [](#new)
    * support for regions in the templates
    * new block template `partials/eventslist.html.twig` for easy inclusion a smaller list anywhere
2. [](#improved)
    * took types out again, better done with taxonomy
    * renamed categories to regions to avoid misunderstandings with taxonomy
    * massively extended README.md

# v1.0.1
##  10/08/2019

1. [](#new)
    * first public release
    * optional categories for events
    * optional types for events

2. [](#bugfix)
    * tiny code fix for links
    * changed version number in `blueprints.yaml`


# v1.0.0
##  10/06/2019

1. [](#new)
    * first usable version
    * `event` as a new post type
    * template for a parent page that lists all `event` children
    * multilang options included
    * optional end dates
    * optional linking of event text
