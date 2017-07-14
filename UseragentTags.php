<?php

namespace Statamic\Addons\Useragent;

use Statamic\Extend\Tags;
use Stringy\StaticStringy as Stringy;

class UseragentTags extends Tags
{
    /** @var array */
    private $data;

    /**
     * Initialize any classes we'll need
     */
    public function init()
    {
        $this->data = $this->api()->getUA();
    }

    /**
     * Display browser information
     *
     * @return string|array {{ useragent:browser }}
     */
    public function browser()
    {
        $output = $this->data['browser'] . ' ' . $this->data['browser_version'];

        // Fetch tag parameter
        $options = $this->get('slugify');

        // Check for slugify option
        if ($options === 'true') {
            return Stringy::slugify($output);
        } else {
            return $output;
        }
    }

    /**
     * Display browser platform information
     *
     * @return string|array
     */
    public function platform()
    {
        $output = $this->data['platform'];

        // Fetch tag parameter
        $options = $this->get('slugify');

        // Check for slugify option
        if ($options === 'true') {
            return Stringy::slugify($output);
        } else {
            return $output;
        }
    }

    /**
     * Display browser language information
     *
     * @return string|array
     */
    public function languages()
    {
        $output = array();
        $output = implode(", ", $this->data['languages'][0]);

        // Fetch tag parameter
        $options = $this->get('slugify');

        // Check for slugify option
        if ($options === 'true') {
            return Stringy::slugify($output);
        } else {
            return $output;
        }
    }

    /**
     * Display browser device information
     *
     * @return string|array
     */
    public function device()
    {
        $output = $this->data['device'];

        // Fetch tag parameter
        $options = $this->get('slugify');

        // Check for slugify option
        if ($options === 'true') {
            return Stringy::slugify($output);
        } else {
            return $output;
        }
    }

    /**
     * Is it mobile?
     *
     * @return boolean
     */
    public function isMobile()
    {
        return $this->data['is_mobile'] ? 'true' : 'false';
    }

    /**
     * Is it tablet?
     *
     * @return boolean
     */
    public function isTablet()
    {
        return $this->data['is_tablet'] ? 'true' : 'false';
    }

    /**
     * Is it desktop?
     *
     * @return boolean
     */
    public function isDesktop()
    {
        return $this->data['is_desktop'] ? 'true' : 'false';
    }

    /**
     * Is it robot?
     *
     * @return boolean
     */
    public function isRobot()
    {
        return $this->data['is_robot'] ? 'true' : 'false';
    }

    /**
     * Display robot name
     *
     * @return string|array
     */
    public function robotName()
    {
        $output = $this->data['robot_name'];

        // Fetch tag parameter
        $options = $this->get('slugify');

        // Check for slugify option
        if ($options === 'true') {
            return Stringy::slugify($output);
        } else {
            return $output;
        }
    }

}
