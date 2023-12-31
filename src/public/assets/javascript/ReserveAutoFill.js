const reserve_date = document.getElementById("date");
reserve_date.addEventListener('blur',function(){
    const confirmation_date = document.getElementById("confirmation_date");
    confirmation_date.textContent = this.value;
});

const reserve_time = document.getElementById("time");
reserve_time.addEventListener('blur',function(){
    const confirmation_time = document.getElementById("confirmation_time");
    if(this.value != "選択してください"){
        confirmation_time.textContent = this.value;
    }
});

const reserve_number = document.getElementById("number");
reserve_number.addEventListener('blur',function(){
    const confirmation_number = document.getElementById("confirmation_number");
    if(this.value != "選択してください"){
        confirmation_number.textContent = this.value + '人';
    }
});