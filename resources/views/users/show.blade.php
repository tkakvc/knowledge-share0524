<div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li>{{$user->name}}さん</li>


                    <div class="plan"> 
                        
                        <p>分類</p>
                        <h4>{{ $user->knowledges()->content }}</h4>
                        
                    </div>
                

            
            
            </div>
                
            </ul>
        </div>
    </div>