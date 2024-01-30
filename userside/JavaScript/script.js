function priceChange(){
    const min = document.getElementsByName('minprice');
    const max = document.getElementsByName('maxprice');

    if(min >= max){
        document.getElementsByID("myPrices").innerHTML = "Min price needs to be smaller than max price.";
    }
}

//stored search item gets put back into search bar
function getSearch(){
    localStorage.getItem('search');
}