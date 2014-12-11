<?php

/**
 * convert request data to view model class
 * @author Gholamreza Fadakar <fadakargholamreza@gmail.com>
 */
class Request
{

    const GET = 1;
    const POST = 2;

    /**
     * bind request data with viewModel class
     * @param ViewModel $view_model
     * @param bool $filter
     * @param array $exclusive
     */
    public static function bind(&$view_model, $method = self::POST, $xss_filter = true, $exclusive = array())
    {
        $ci = get_instance();

        if (is_array($method))
        {
            if (isset($method['xss']))
                $xss_filter = $method['xss'];
            if (isset($method['exclusive']))
                $exclusive = $method['exclusive'];
            if (isset($method['method']))
                $method = $method['method'];
        }

        $vars = array_keys(get_class_vars(get_class($view_model)));
        switch ($method)
        {
            case self::GET:
                $request = $ci->input->get(null, $xss_filter);
                break;
            case self::POST:
                $request = $ci->input->post(null, $xss_filter);
                break;
            default:
                return $view_model;
        }

        if (is_array($vars) && count($vars) < 1)
        {
            return $view_model;
        }
        if (!$request)
        {
            return $view_model;
        }

        if (!is_array($exclusive))
        {
            $exclusive = array();
        }

        foreach ($vars as $var)
        {
            if (!in_array($var, $exclusive) && in_array($var, array_keys($request)))
            {
                $view_model->{$var} = $request[$var];
            }
        }
    }

}
