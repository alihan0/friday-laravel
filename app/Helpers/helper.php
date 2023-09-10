<?php
use App\Models\Offer;
use Illuminate\Support\Carbon;

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

if(!function_exists('offerDuration')){
    function offerDuration($offerId){
        $offer = Offer::find($offerId);

        if (!$offer) {
            return false;
        }

        $time = $offer->validity_time;
        $thisdate = Carbon::now();
        $startdate = Carbon::parse($offer->created_at);
        $enddate = $startdate->addDays($time);
        $duration = $enddate->diffInDays($thisdate);

        if ($duration < 1) {
            if($offer->status == 1){
                $offer->status = 0;
                $offer->reason = "Sistem İptali (Zaman Aşımı).";
                $offer->save();
            }
            
            return '<span class="badge text-bg-danger">Süre Doldu</span>';
        }

        return '<span class="badge text-bg-primary">' . $duration. ' Gün</span>';
    }
}
