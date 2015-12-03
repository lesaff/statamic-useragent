# Statamic Useragent addon
Requirement: Statamic 2.x

### What is this?
Useragent returns various information from your browser, such as:
- Browser name (Chrome, Firefox, Safari, IE, etc)
- Version
- Language settings
- Platform (OS X, Windows, Linux, etc)

It is also an awesome device detector.
`{{ useragent:is_mobile }}` will return true if visiting browser is a mobile device.

### Installation
- Copy `Useragent` folder to your `site/addons` folder
- Log on to your control panel, visit `/cp/system/addons`, make sure that `Useragent` is listed
- Click on the Refresh button on the top right of your browser to initialize new addon
- Alternatively, go to your terminal, `cd` to your website root and type `php please addon:refresh` and hit Enter.

### Available options & usage examples
```
Browser: {{ useragent:browser slugify="false" }}<br />
Languages: {{ useragent:languages slugify="false" }}<br />
Device: {{ useragent:device slugify="false" }}<br />
Platform: {{ useragent:platform slugify="false" }}<br />
Is Mobile?: {{ useragent:is_mobile }}<br />
Is Tablet?: {{ useragent:is_tablet }}<br />
Is Desktop?: {{ useragent:is_desktop }}<br />
Is Robot?: {{ useragent:is_robot }}<br />
Robot Name: {{ useragent:robot_name slugify="false" }}<br />
```

### API
This addon can be used with other addon. Just use the following code example:
```
if (addon('Useragent')) {
    $browser     = $this->api('Useragent')->getUA();
    $browser_ver = $browser['browser'] . ' ' . $browser['browser_version'];
}
```