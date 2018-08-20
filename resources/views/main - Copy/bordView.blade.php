@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@endsection


@section('content')
<div id="bord">
<div class="ct-chart ct-perfect-fourth"></div>  
</div>
@endsection

@section('script')


<script>

var vu = new Vue({
		  el:'#bord',

		  
		  data:{
				Projects:[],
        data:[0,0,0,0,0,0,0],
      },
      mounted:function(){
				this.getProjects();
        

      },
      methods:{
        getProjects(){
					 
					 this.$http.get('/apiProjet').then( (data) => 
						  { 
								
								console.log(data.data);

								this.Projects=data.data.listProjets;
                for (i = 0; i < this.Projects.length; i++) { 

                    
                    month=new Date(this.Projects[i].projet.created_at).getMonth()+1;
                    if(month==1){
                      this.data[0]+=1;
                    }else if(month==3){
                      this.data[2]+=1; 
                    }


                }

                data = {
                  labels: ['Janvier', 'Fevrier', 'Mars', 'avril', 'Mai','Juin','juiller'],
                  series: [
                    this.data,
                  ]
                };
								console.log(this.data);
								new Chartist.Line('.ct-chart', data , {low: 0,showArea: true
                }); 

						  });

					 
				},
      }
})
    

// console.log(vu.$data.data);
// new Chartist.Line('.ct-chart', data);
</script>

@endsection
