<?php

namespace App\Transaction\Constants;

use App\Models\SettingsDefaults;

final class PengaturanMempelai {
    public const SET_URL = 'url';
    public const SET_MUSIC = 'music';
    public const SET_FITUR = 'fitur';
    public const SET_TEMPLATE = 'template';
    public const SET_TEXT_UNDANGAN = 'text_undangan';

    public static function getDefaultTextUndangan()
    {
        return SettingsDefaults::where('key', 'text_undangan')->first()->value;
    }


}
