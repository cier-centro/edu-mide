<?php

require_once 'Reader.php';

class BaseMide {

    protected $reader;

    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getArrayAllUniversitiesByCodeIes($codeIes) {
        $sheet = $this->reader->getSheetObject();
        $universitiesArray = array();

        for ($file = 2; $file <= $sheet->getHighestRow(); $file++) {
            $cellCodeIesValue = $sheet->getCellByColumnAndRow(1, $file)->getValue();

            if ($codeIes == $cellCodeIesValue) {
                $universitiesArray[] = $sheet->getCellByColumnAndRow(0, $file)->getValue();
                $universitiesArray[] = $sheet->getCellByColumnAndRow(1, $file)->getValue();
                $universitiesArray[] = $sheet->getCellByColumnAndRow(2, $file)->getValue();
                $universitiesArray[] = $sheet->getCellByColumnAndRow(3, $file)->getValue();
                $universitiesArray[] = $sheet->getCellByColumnAndRow(4, $file)->getValue();
                $universitiesArray[] = $sheet->getCellByColumnAndRow(5, $file)->getValue();
            }
        }

        return $universitiesArray;
    }

    public function getArrayAllUniversities() {
        $sheet = $this->reader->getSheetObject();
        $universitiesArray = array();

        $i = 0;

        for ($file = 2; $file <= $sheet->getHighestRow(); $file++) {

            $codeIes = $sheet->getCellByColumnAndRow(0, $file)->getValue();
            $nameUniversity = $sheet->getCellByColumnAndRow(1, $file)->getValue();
            $sector = $sheet->getCellByColumnAndRow(2, $file)->getValue();
            $classification = $sheet->getCellByColumnAndRow(3, $file)->getValue();
            $isAccredited = $sheet->getCellByColumnAndRow(4, $file)->getValue();
            $score = number_format(($sheet->getCellByColumnAndRow(5, $file)->getValue() * 100),1);
            $score_est = number_format(($sheet->getCellByColumnAndRow(6, $file)->getValue() * 100),1);
            $caracter = $sheet->getCellByColumnAndRow(7, $file)->getValue();
            $productMide = $sheet->getCellByColumnAndRow(8, $file)->getValue();

            $universitiesArray[$i]['codeIes'] = $codeIes;
            $universitiesArray[$i]['nameUniversity'] = $nameUniversity;
            $universitiesArray[$i]['sector'] = $sector;
            $universitiesArray[$i]['classification'] = $classification;
            $universitiesArray[$i]['isAccredited'] = $isAccredited;
            $universitiesArray[$i]['score'] = $score;
            $universitiesArray[$i]['score_est'] = $score_est;
            $universitiesArray[$i]['caracter'] = $caracter;
            $universitiesArray[$i]['productMide'] = $productMide;

            $i++;
        }

        return $universitiesArray;
    }

}
