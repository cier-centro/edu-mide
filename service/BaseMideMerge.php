<?php

class BaseMideMerge {
    
    /**
     * @type Reader
     * @type Level
     * @type Word 
     */
    
    protected $reader;
    protected $baseMide;
    
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setBaseMide($baseMide) {
        $this->baseMide = $baseMide;
    }
    
    public function getArrayAllUniversitiesToBuildJson() {
        $universitiesArray = $this->baseMide->getArrayAllUniversities();
        $dataArray = array();

        foreach ($universitiesArray as $i => $universities) {
            $dataArray[$i]['codeIes'] = $universities['codeIes'];
            $dataArray[$i]['nameUniversity'] = $universities['nameUniversity'];
            $dataArray[$i]['sector'] = $universities['sector'];
            $dataArray[$i]['classification'] = $universities['classification'];
            $dataArray[$i]['isAccredited'] = $universities['isAccredited'];
            $dataArray[$i]['score'] = $universities['score']."%";
            $dataArray[$i]['score_est'] = $universities['score_est']."%";
            $dataArray[$i]['caracter'] = $universities['caracter'];
            $dataArray[$i]['productMide'] = $universities['productMide'];
        }
        
        return $dataArray;
    }
    
}
