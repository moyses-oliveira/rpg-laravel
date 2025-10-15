<?php
namespace Modules\Documentation\DataTables;

use Modules\Blueprint\Helpers\DifTestScale;

class SkillTreeDatatable extends AbstractDatatable
{

    public function __construct()
    {
        $header = [ '#', 'NH 1', 'NH 2', 'NH 3', 'NH 4', 'NH 5'];
        $data = [];
        $yIndex = range(1,12);
        foreach ($yIndex as $attr):
            $row = [$attr];
            foreach ($header as $skillLevel=>$skillLabel):
                if($skillLevel < 1)
                    continue;

                $row[$skillLevel] = DifTestScale::difficultForHumans($attr, $skillLevel);
            endforeach;
            $data[] = $row;
        endforeach;
       $this->setDataHeader($header, $data);
    }


}
