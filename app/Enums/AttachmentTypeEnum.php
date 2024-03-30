<?php

namespace App\Enums;

enum AttachmentTypeEnum: string
{
    case IMAGE = 'image';
    case VIDEO = 'video';
    case FILE = 'file';
}
