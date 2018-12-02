function lstImpressions(data) {
    dataLayer.push({
        'ecommerce': {
            'currencyCode': 'USD',
            'impressions': data
        }
    });
}

function lstDetail(product) {
    dataLayer.push({
        'ecommerce': {
            'detail': {
                'actionField': {'list': ''},
                'products': product
            }
        }
    });
}

function lstAddToCart(product) {
    dataLayer.push({
        'event': 'addToCart',
        'ecommerce': {
            'currencyCode': 'USD',
            'add': {
                'products': product
            }
        }
    });
}

function lstOnCheckout(product) {
    dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
            'checkout': {
                //'actionField': {'step': 1, 'option': 'Visa'},
                'products': product
            }
        },
        'eventCallback': function() {
            //document.location = 'checkout.html';
        }
    });
}

function lstPurchase(products, purchase) {
    dataLayer.push({
        'ecommerce': {
            'purchase': {
                'actionField': purchase,
                'products': products
            }
        }
    });
}