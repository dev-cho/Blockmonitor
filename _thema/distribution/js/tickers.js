
marketCapTicker();
function marketCapTicker() {
    var url ="https://api.coinmarketcap.com/v2/ticker/825/?convert=KRW";
    $.getJSON( url, function( data ) {
        $('#usdt_tickers').html( numberWithCommas( parseInt( data.data.quotes.KRW.price) ) );
    });
}
function binace_connect(){
    try{
        
        var host = "wss://stream.binance.com:9443/ws/!ticker@arr";
        var socket = new WebSocket(host);
        message('<p class="event">Socket Status: '+socket.readyState);
        socket.onopen = function(){
            message('<p class="event">Socket Status: '+socket.readyState+' (open)');
        }
        socket.onmessage = function(msg){
            
            var arr = $.parseJSON(msg.data);
            var eth,btc,usdt,all = '';
            
            $.each( arr, function( k, v ) {
                var symbols = v.s;
                var ticker24;
                symb = symbols.substr(-3, 3);
                if(0 > v.P) {
                    ticker24 = '<span style="color:red;" class="pull-right">'+v.P+'%</span>';
                }else {
                    ticker24 = '<span style="color:green;" class="pull-right">'+v.P+'%</span>';
                }
                
                if (symb == "SDT") {
                    var coinName = symbols.replace(/USDT/gi, "");
                    var ticker = parseFloat(v.c);
                    var usdt = $('#usdt_tickers').html();
            
                    usdt = usdt.replace(/,/gi, ""); 
                    var tmpPrice = parseFloat(ticker) * parseInt( usdt )  ;
                    $('#binance_ticker_'+coinName).html ( numberWithCommas(parseInt(tmpPrice) )+ ' KRW '+ticker24);
                    //$('#binance_ticker_'+coinName).html (ticker.toFixed(2)+ ' USDT '+ticker24);
                }
            });
            marketCapTicker();
            huobi_connect();
            upbit_connect();
            bithumb_connect();
            
           
        }
        socket.onclose = function(){
            message('<p class=�쓊vent��>Socket Status: '+socket.readyState+' (Closed)');
        }

        
    } catch(exception){
         message('<p>Error'+exception);
    }
}

function message(msg){
    //console.log(msg);
}

function huobi_connect() {
    var ticker24;
    var usdt = new Array(
        'btc','bch',
        'eth','etc',
        'ltc','eos',
        'xrp','omg',
        'zec','dash',     
        'steem','ada',                         
    );
    $.each(usdt,function(k,v) {
        $.getJSON('https://api.huobi.pro/market/detail/merged?symbol='+v+"usdt", function( data ) {
           
            var symb = v.substr(-3, 5);
            var persent = (data.tick.open - data.tick.close) / data.tick.open*100;
            if(0 > persent) {
                ticker24 = '<span style="color:red;" class="pull-right">'+persent.toFixed(1)+'%</span>';
            }else {
                ticker24 = '<span style="color:green;" class="pull-right">'+persent.toFixed(1)+'%</span>';
            }
            var usdt = $('#usdt_tickers').html();
            
            usdt = usdt.replace(/,/gi, ""); 
            var tmpPrice = parseFloat(data.tick.close) * parseInt( usdt )  ;
            
            //$('#huobi_ticker_'+symb.toUpperCase() ).html(data.tick.close + ' USDT'+ticker24);
            $('#huobi_ticker_'+symb.toUpperCase() ).html( numberWithCommas(parseInt(tmpPrice)) + ' KRW'+ticker24);
        });
    });
}

function upbit_connect() {
    
    var arr = new Array(
        'BTC','ETH',
        'LTC','XRP',
        'XMR','ZEC',
        'QTUM','EOS',
        'TRX',                    
    );
    $.each(arr,function(k,v) {
        
        $.getJSON('https://crix-api-endpoint.upbit.com/v1/crix/candles/days/?code=CRIX.UPBIT.KRW-'+v+'&count=1', function( data ) {
            var persent = (data[0].openingPrice - data[0].tradePrice) / data[0].openingPrice*100;
            if(0 > persent) {
                ticker24 = '<span style="color:red;" class="pull-right">'+persent.toFixed(1)+'%</span>';
            }else {
                ticker24 = '<span style="color:green;" class="pull-right">'+persent.toFixed(1)+'%</span>';
            }
            $('#upbit_ticker_'+v).html( numberWithCommas(data[0].tradePrice)+ ' KRW'+ticker24);
        });
              
    });
}


function bithumb_connect(){
    
    var url ="https://api.bithumb.com/public/ticker/all";

    $.getJSON( url, function( data ) {
        $.each( data['data'], function( k, v ) {
            var ticker24;
            if(k != "date") {
                var persent = (v.opening_price-v.closing_price) / v.opening_price*100;
                if(0 > persent) {
                    ticker24 = '<span style="color:red;" class="pull-right">'+persent.toFixed(1)+'%</span>';
                }else {
                    ticker24 = '<span style="color:green;" class="pull-right">'+persent.toFixed(1)+'%</span>';
                }
                $('#bithumb_ticker_'+k).html( numberWithCommas(v.closing_price)+ ' KRW'+ticker24);
            }
          
        });
    });
}