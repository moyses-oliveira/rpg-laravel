<?php
namespace Modules\Documentation\DataTables;


use Modules\Blueprint\Helpers\DifTestScale;

class CharacterProgressDatatable extends AbstractDatatable
{
    public function __construct()
    {
        $header = ['Nível', 'Atributo', 'Hablilidade', 'Dificuldade', 'Slots', 'Talentos'];
        $data = [
            $this->makeRow(1, 6, 3, 1, '+ 1 Manobra Básica'),
            $this->makeRow(2, 6, 3, 2,'+ 1 Manobra Básica + 1 Talento Nv. 2'),
            $this->makeRow(3, 7, 3, 4, '+ 1 Manobra Aprimorada'),
            $this->makeRow(4, 7, 4, 6,'+ 1 Manobra Aprimorada + 1 Talento Nv. 4'),
            $this->makeRow(5, 8, 4, 9,'+ 1 Manobra Avançada'),
            $this->makeRow(6, 8, 4, 14,'+ 1 Manobra Avançada + 1 Talento Nv. 6'),
            $this->makeRow(7, 9, 4, 20,'+ 1 Manobra Especial'),
            $this->makeRow(8, 9, 5, 28,'+ 1 Manobra Especial + 1 Talento Nv. 8'),
            $this->makeRow(9, 10, 5, 40,'+ 1 Manobra Lendária'),
            $this->makeRow(10, 10, 5, 60,'+ 1 Manobra Lendária + 1 Talento Nv. 10')
        ];
        $this->setDataHeader($header, $data);

    }

    private function makeRow(int $level, int $attribute, int $talent, int $slots, string $improvements ):array
    {
        return [
            $level,
            $attribute,
            $talent,
            DifTestScale::difficultForHumans($attribute, $talent),
            $slots,
            $improvements,
        ];

    }


}
