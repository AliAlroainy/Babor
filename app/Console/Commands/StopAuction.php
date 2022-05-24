<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StopAuction extends Command
{
    protected $signature = 'log:cron';
    protected $description = 'Command description';
    public function handle()
    {
        Auction::where(['status' => '2', 'closeDate' >= now()])->update([
            'status' => '4',
            'winnerPrice'=> $this->bids->sortDesc()->first()->currentPrice,
            'winner_id' => Bid::where('auction_id', $id)->orderBy('id', 'desc')->first()->bidder_id]
        );
        $this->when($this->first()->bids->count() > 0, function ($q) use ($id){
            $this->refundBidders($id);
            $notify = new NotificationController();
            $notify->cancelAuction($this->first(),$id);
        });
    }
}
