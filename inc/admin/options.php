<?php

function alkima_get_options($path, $pass_inside = [], $relative = true) {
	if ($relative) {
		$path = get_template_directory() . '/inc/admin/options/' . $path . '.php';
	}

	if (! file_exists($path)) {
		return null;
	}

	return apply_filters('alkima_theme_options_retrieve', alkima_akg(
		'options',
		alkima_get_variables_from_file(
			$path,
			['options' => []],
			$pass_inside
		)
	), $path, $pass_inside);
}


function alkima_akg($keys, $array_or_object, $default_value = null) {
    if (! is_array($keys)) {
        $keys = explode('/', (string) $keys);
    }
    // @todo: check if this is needed
    // $array_or_object = $array_or_object;
    $key_or_property = array_shift($keys);

    if (is_null($key_or_property)) {
        return $default_value;
    }

    $is_object = is_object($array_or_object);

    if ($is_object) {
        if (! property_exists($array_or_object, $key_or_property)) {
            return $default_value;
        }
    } else {
        if (! is_array($array_or_object) || ! array_key_exists($key_or_property, $array_or_object)) {
            return $default_value;
        }
    }

    if (isset($keys[0])) { // not used count() for performance reasons.
        if ($is_object) {
            return alkima_akg($keys, $array_or_object->{$key_or_property}, $default_value);
        } else {
            return alkima_akg($keys, $array_or_object[$key_or_property], $default_value);
        }
    } else {
        if ($is_object) {
            return $array_or_object->{$key_or_property};
        } else {
            return $array_or_object[ $key_or_property ];
        }
    }
}