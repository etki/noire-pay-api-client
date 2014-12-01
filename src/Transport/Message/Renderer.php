<?php

namespace Etki\Api\Clients\NoirePay\Transport\Message;

/**
 * Renders messages.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Transport\Message
 * @author  Etki <etki@etki.name>
 */
class Renderer
{
    /**
     * Renders message.
     *
     * @param array $message Message data to render.
     *
     * @return string Returns rendered message.
     * @since 0.1.0
     */
    public static function render(array $message)
    {
        $sections = array();
        foreach ($message as $sectionKey => $data) {
            $section = array();
            foreach ($data as $key => $value) {
                $itemKey = strtoupper($sectionKey . '.' . $key);
                $section[] = $itemKey . '=' . $value;
            }
            $sections[] = implode(PHP_EOL, $section);
        }
        return implode(PHP_EOL . PHP_EOL, $sections);
    }
}
