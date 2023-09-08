<?php

if (!function_exists('formatSeconds')) {
    function formatSeconds($seconds) {
        // Gün, saat ve dakikaları hesapla
        $hours = floor($seconds / (60 * 60));
        $seconds -= $hours * (60 * 60);
        $minutes = floor($seconds / 60);
    
        // Zaman dilimlerini oluştur
        $result = '';
        if ($hours > 0) {
            $result .= $hours . ' Saat ';
        }
        if ($minutes > 0 && $hours < 2) {
            $result .= $minutes . ' Dakika';
        }
    
        return $result;
    }
}
