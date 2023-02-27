<?php
use Breakdance\DynamicData\StringField;
use Breakdance\DynamicData\StringData;

class ShortcodeUrlField extends StringField
{
    /**
     * @return string
     */
    public function label()
    {
        return 'Shortcode (URL)';
    }

    /**
     * @return string
     */
    public function category()
    {
        return 'Utility';
    }

    /**
     * @return string
     */
    public function slug()
    {
        return 'faw_url_shortcode';
    }

    public function returnTypes()
    {
        return ['url', 'string'];
    }

    /**
     * @inheritDoc
     */
    public function controls()
    {
        return [
            \Breakdance\Elements\control('shortcode', 'Shortcode', [
                'type' => 'text',
                'layout' => 'vertical',
                'textOptions' => ['multiline' => true],
            ]),
        ];
    }

    /**
     * @inheritDoc
     */
    public function handler($attributes): StringData
    {
        if (!array_key_exists('shortcode', $attributes)) {
            return StringData::emptyString();
        }
        $output = do_shortcode($attributes['shortcode']);
        return StringData::fromString($output);
    }
}
