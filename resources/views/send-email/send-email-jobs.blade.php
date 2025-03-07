
<a style=" color: #00acff; text-align: center" href="{{Request::root().'/hy/jobs/'.$details['job_id'].'/'.str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($details['slug'], 'UTF-8'))}}"><h1>{{$details['title']}}</h1></a></p>

<p><h2><a style="color:#00acff">Անուն Ազգանուն:</a> {{$details['name']}}</h2></p>
<p><h2><a style="color:#00acff">Հեռ:</a> {{$details['phone']}}</h2></p>
<p><h2><a style="color:#00acff">Էլ Հասցե:</a> {{$details['email']}}</h2></p>
@if(!empty($details['linkedin'])) <p><h2><a  style="color:#00acff" target="_blank" href="{{$details['linkedin']}}">Linkedin </a></h2></p> @endif
@if(!empty($details['facebook'])) <p><h2><a  style="color:#00acff" target="_blank" href="{{$details['facebook']}}">Facebook </a></h2></p> @endif
@if(!empty($details['message'])) <p><h2><a style="color:#00acff">Հաղորթագրություն:</a> {{$details['message']}}</h2></p> @endif
