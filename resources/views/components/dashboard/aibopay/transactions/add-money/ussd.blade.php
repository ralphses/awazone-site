<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add by USSD</h4>
            <p class="card-text">Type in the amount you want to add to your account and tap the right USSD code below</p>

            <div class="mb-3 position-relative">
                <label class="form-label" for="amount">Amount</label>
                <input type="number" class="form-control" min="100" id="amount" value="100" placeholder="Enter amount">
            </div>
        </div>
        
        <ul class="list-group list-group-flush">
            @foreach ($ussds as $ussd)
                <li class="list-group-item">
                    <strong>{{ $ussd->getBank() }}</strong>
                    <br>
                    <a class="card-link ussd" href="{{ "tel:".$ussd->getUssd() }}">{{ $ussd->getUssd() }}</a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('aibopay.dashboard') }}" class="float-left btn btn-primary">Cancel Transaction</a>

    </div>
</div>


<script>
    const amount = document.getElementById('amount');
    const ussd = document.querySelectorAll('.ussd');

    ussd.forEach(element => {
            
            let oldVlue = element.href;
           
            element.textContent =  oldVlue.replaceAll('Amount', '100');
            element.value =  oldVlue.replaceAll('Amount', '100');
            
        });
    
    amount.addEventListener('input', (e) => {

        if(e.target.value < 100) {
            e.target.value = 100;
        }

        ussd.forEach(element => {
            
            let oldVlue = element.href;
           
            element.textContent =  oldVlue.replaceAll('Amount', e.target.value);
            element.value =  oldVlue.replaceAll('Amount', e.target.value);
            
        });
    });
</script>

