<?php

namespace Mamarmite\Sharing\Traits;

defined('ABSPATH') || exit;

use Mamarmite\Sharing\Data\Log;

trait LoggerTrait {
    
    /**
     * Log
     * @param string $message
     */
    public function log($message, $type="error", $to_wp_default=false)
    {
        if (!$to_wp_default)
        {
            $this->$type($message);
        }
        else
        {
            error_log($message);
        }
    }
    
    public function warning($message) {
        Log::warning($message);
    }
    
    public function error($message) {
        Log::error($message);
    }
    
    public function info($message) {
        Log::info($message);
    }
    
}