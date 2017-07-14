<?php

namespace Statamic\Addons\Useragent;

use Jenssegers\Agent\Agent;
use Statamic\Extend\API;

class UseragentAPI extends API
{
    /** @var array */
    private $data;

    protected function init()
    {
        // Initialize UA
        $agent = new Agent();
        $browser = $agent->browser();

        // Assemble data
        $this->data = [
            'browser'         => $browser,
            'browser_version' => $agent->version($browser),
            'languages'       => array($agent->languages()),
            'device'          => $agent->device(),
            'platform'        => $agent->platform(),
            'is_mobile'       => $agent->isMobile(),
            'is_tablet'       => $agent->isTablet(),
            'is_desktop'      => $agent->isDesktop(),
            'is_robot'        => $agent->isRobot(),
            'robot_name'      => $agent->robot()
        ];
    }

    /**
     * Accessed by $this->api('Useragent')->getUA() from other addons
     */
    public function getUA()
    {
        return $this->data;
    }
}
