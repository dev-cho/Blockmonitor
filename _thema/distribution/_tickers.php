<script src='<?php echo base_url() . "_thema/distribution/js/tickers.js"; ?>'></script>

<section class="featured-posts no-padding-top"> 
    <div class="container">
        <header> 
            <h2>Exchange Tickers </h2>
            <p class="text-big">1 USDT = <span id="usdt_tickers"></span> KRW</p>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Exchange</th>
                            <th>BTC</th>
                            <th>ETH</th>
                            <th>EOS</th>
                            <th>LTC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $exchangeArr = array("bithumb","upbit","huobi","binance");
                        $coinArr = array("BTC","ETH","EOS","LTC");
                        
                        foreach ($exchangeArr as $kk=>$vv) {
                        ?>
                        <tr>
                            <td><?php echo ucfirst($vv); ?></td>
                        <?php
                            foreach($coinArr as $k => $v) {
                        ?>
                            
                            <td id="<?php echo $vv; ?>_ticker_<?php echo $v; ?>"></td>
                        <?php
                            }
                        ?>
                        </tr>
                        <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>

binace_connect();
function numberWithCommas(x) { return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}
</script>