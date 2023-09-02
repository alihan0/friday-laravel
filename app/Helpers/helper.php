<?php

if (!function_exists('formatSeconds')) {
    function formatSeconds($seconds) {
        // Gün, saat ve dakikaları hesapla
        $days = floor($seconds / (60 * 60 * 24));
        $seconds -= $days * (60 * 60 * 24);
        $hours = floor($seconds / (60 * 60));
        $seconds -= $hours * (60 * 60);
        $minutes = floor($seconds / 60);
    
        // Zaman dilimlerini oluştur
        $result = '';
        if ($days > 0) {
            $result .= $days . ' Gün ';
        }
        if ($hours > 0) {
            $result .= $hours . ' Saat ';
        }
        if ($minutes > 0 && empty($result)) {
            $result .= $minutes . ' Dakika';
        }
    
        return $result;
    }
}
