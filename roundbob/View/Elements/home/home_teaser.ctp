<div class="selectable-countries" style="position: fixed;margin-top: 25%;margin-left: 50%;z-index: 1;"></div>
<div class="teaser">
    <div class="container">
      <div class="row">
        <div class="span12 headline">
          <h1>&nbsp;</h1>
          <small>&nbsp;</small>
          <i class="description">&nbsp;</i>
        </div><!--/span12-->
      </div><!--/row-->
      <div class="row animated fadeInUp">
        <div class="span12">
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <!--slide-->
              <div class="active item">
                <div class="row">
                  <div class="span6">
					<table>
						<tr>
							<td style="width:30%"><img src="<?php echo $this->webroot;?>assets/slide-half-1.png" alt="" style="margin-left:10%;position:relative"></td>
							<td ><img src="<?php echo $this->webroot;?>img/adds/snap1.png" alt="" width="500px" style="border-radius:10px;border:3px solid #999;"></td>
						</tr>
					</table>                    
                  </div>
                  <div class="span4">                   
					<div class="select-your-country">
						<?php echo $this->Form->create('User',array('type'=>'file','id'=>'user_add_form'));?>
							<fieldset>
								<div class="input select">
								<label style="font-weight:bold;color:green;font-size:25px;"><span class="">1.</span> Choose your country</label><br/>
								<select name="data[User][role]" style="background:#eee;" class="the-selected-country">
									<option selected="selected">Where are you?</option>
									<?php  foreach($available_countries as $c): ?>
										<option value="<?php echo $c['Country']['id']; ?>"><?php echo $c['Country']['name']; ?></option>
									<?php endforeach; ?> 
								</select>
								</div>
							</fieldset>
						</form>
					</div>
					<?php if(!$logged_in): ?>
					<div>
						<a href="<?php echo $this->webroot.'users/register';?>"><span class="btn btn-success"><i style="margin-top: 5%;" class="icon-white icon-th"></i> Sign up</span></a>
					</div>
					<?php endif; ?>
                  </div>
                </div>
              </div>
              <!--slide-->
              <div class="item">
                <div class="row">
                  <div class="span6 animated rotateInDownLeft" style="width:15%;">
                    <table>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td style="width:30%"><img src="<?php echo $this->webroot;?>assets/slide-half-1.png" alt="" style="margin-left:25%;position:relative"></td>
						</tr>
					</table> 
                  </div>
                  <div class="span4 animated rotateInUpRight" style="width:70%;">
                    <table>
						<tr><td colspan="3"><center><span style="font-size:30px;font-weight:bold;color:#999">Where do you</span></center></td></tr>
						<tr><td colspan="3"><center><span style="font-size: 19px;font-weight: normal;color: #999;">Wish to go?</span></center></td></tr>
						<tr>
							<td ><center><span style="color:green;font-weight:bold">Africa</span></center><br/>
							<a class="africa" href="<?php echo $this->webroot;?>categories/show/100001"><img src="<?php echo $this->webroot;?>img/countries/100001.png" alt="" width="500px" style="border-radius:10px;border:3px solid #999;" /></a></td>
							<td ><center><span style="color:green;font-weight:bold" class="selected-country-name">&nbsp;</span></center><br/>
								<span class="selected-country">
							<a href="<?php echo $this->webroot;?>categories/show"><img src="<?php echo $this->webroot;?>img/adds/snap1.png" alt="" width="500px" style="border-radius:10px;border:3px solid #999;margin-right:130px;margin-left:10px;" /></a>
								</span>
							</td>
							<td ><center><span style="color:green;font-weight:bold">International</span></center><br/>
							<a class="international" href="<?php echo $this->webroot;?>categories/show/100002"><img src="<?php echo $this->webroot;?>img/countries/100002.png" alt="" width="500px" style="border-radius:10px;border:3px solid #999;margin-left:20px;" /></a></td>
						</tr>						
					</table>
                  </div>
                </div>
              </div>
            </div><!--/carousel-inner-->
            <!-- Carousel nav -->
            <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lt;</a>-->
            <a class="carousel-control right steps stepOne" href="#myCarousel" data-slide="next" c-found=0><i class="icon-white icon-hand-right" style="margin-top:12px;"></i></a>
          </div><!--/myCarousel-->
        </div><!--/span12-->
      </div><!--/row-->
    </div><!--/container-->
  </div>
  
  <script>
  $(document).ready(function(){
	$(function() {
		$('.carousel').each(function(){
			$(this).carousel({
				interval: false
			});
		});
	});
	
	$('.africa').click(function(){
		$.get('<?php echo $this->webroot; ?>dashboards/get_african_countries',function(returned_data){
			$('.selectable-countries').html(returned_data);
		});
		return false;
	});
	
	$('.international').click(function(){
		$.get('<?php echo $this->webroot; ?>dashboards/get_international_countries',function(returned_data){
			$('.selectable-countries').html(returned_data);
		});
		return false;
	});
	
	$('.steps, .carousel-control').click(function(){
		if($('select').val()=='Where are you?'){
			alert("select a country.");
			return false;
		}
		_this=$(this);
		$.getJSON('<?php echo $this->webroot; ?>dashboards/set_country/'+($('select').val()), function(data) {
			if(Number(data.data.status)==1){
				$(_this).attr('c-found',1);
				$('.selected-country').html('<a href="<?php echo $this->webroot;?>categories"><img src="<?php echo $this->webroot;?>img/imagecache/countries/'+($('select').val())+'.png" alt="" width="500px" style="border-radius:10px;border:3px solid #999;margin-right:130px;margin-left:10px;" /></a>');
				$('.selected-country-name').html($(".the-selected-country option:selected").text());			
				
			}else{
				alert('Country not found.');
				$(_this).attr('c-found',0);
				return false;
			}
		});		
	});
  });
  </script>