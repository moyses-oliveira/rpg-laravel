<?php
namespace Modules\Documentation\DataTables;

abstract class AbstractDatatable
{
    protected array $header = [];
    protected array $data = [];

    public function setDataHeader(array $header, array $data)
    {
        $this->header = $header;
        $this->data = $data;
    }

    public function render()
    {
        $header = $this->getHeader();
        $data = $this->getData();
       echo view('documentation.datatable', compact('header', 'data'))->render();
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function getData(): array
    {
        return $this->data;
    }


}
