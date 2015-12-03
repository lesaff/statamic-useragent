<?php

namespace Statamic\Addons\Useragent;

use Statamic\Extend\API;
use Jenssegers\Agent\Agent;

class UseragentAPI extends API
{
    /**
     * Accessed by $this->api('Useragent')->getUA() from other addons
     */
    public function getUA()
    {
        // Initialize UA
        $agent = new Agent();
        $browser = $agent->browser();

        // Assemble data
        $data = [
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
        return $data;
    }
}
