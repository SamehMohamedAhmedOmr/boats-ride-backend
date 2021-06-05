<?php

namespace Modules\Users\Helpers;


class UsersHelper
{

    public function nationalID(){
        return '/(2|3)[0-9][1-9][0-1][0-9][0-3][0-9](01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)[0-9][0-9][0-9][0-9][0-9]$/u';
    }

}
