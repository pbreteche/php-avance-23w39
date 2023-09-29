<?php

namespace App\Entity;

enum PostStateEnum: string
{
    case Draft = '0-draft';
    case Published = '1-published';
    case Unpublished = '2-unpublished';
    case Deleted = '3-deleted';
}
