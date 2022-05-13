<?php
    function createUrlSlug($urlString){
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }
?>