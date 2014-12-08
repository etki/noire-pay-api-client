<?php

namespace Etki\Api\Clients\NoirePay\Level\Api;

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
     * Renders message plainly.
     *
     * @param array $message
     *
     * @return string
     * @since
     */
    public static function renderPlain(array $message)
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

    /**
     * Renders message.
     *
     * @param array    $message Message to render.
     * @param string[] $schema  Order in which sections should go. `null`s
     *                          represent spacers.
     *
     * @return string Rendered message.
     * @since 0.1.0
     */
    public static function render(array $message, array $schema)
    {
        $prependSpacer = false;
        $lines = array();
        foreach ($schema as $section) {
            if ($section === null) {
                $prependSpacer = true;
                continue;
            }
            if (!isset($message[$section])) {
                continue;
            }
            if ($prependSpacer) {
                if (sizeof($lines)) {
                    $lines[] = '';
                }
                $prependSpacer = false;
            }
            foreach ($message[$section] as $key => $value) {
                $lines[] = strtoupper($section . '.' . $key) . '=' . $value;
            }
        }
        return implode(PHP_EOL, $lines);
    }
}
