<?php
 include_component('home','leftmenu');
 include_component('home','messages');
?>
<?php use_helper('Object') ?>
<script type="text/javascript">
	function validate(){
		if(document.search.firstname.value == '' && document.search.lastname.value == '' && document.search.branch.value == 0 && document.search.year.value == 0 && document.search.chapter.value == 0 && document.search.location.value == '' && document.search.country.value == 0){
			alert("You Should select at least one field");
			return false;
		}
	}
</script>
<?php echo form_tag('search/result', array('onSubmit'=>'return validate()', 'name'=>'search')) ?>
<div class="page">
	<h3>Search Alumni Database</h3>
	<div class="vspacer20">&nbsp;</div>
	<div class="oddRow">
		<div class="formleftcol">
			<div class="formleftcoltext">First Name :</div>
		</div>
		<div class="formrightcol"><input type="text" name="firstname"></div>
	</div>
	<div class="evenRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Last Name :</div>
		</div>
		<div class="formrightcol"><input type="text" name="lastname"></div>
	</div>
	<div class="oddRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Branch :</div>
		</div>
		<div class="formrightcol"><?php echo select_tag('branch', options_for_select($broptions), array(
			'include_blank' => true,
			))?></div>
	</div>
	<div class="evenRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Year of Graduation :</div>
		</div>
		<div class="formrightcol"><?php echo select_tag('year', options_for_select($yroptions), array(
			'include_blank' => true,
			))?></div>
	</div>
	<div class="oddRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Chapter :</div>
		</div>
		<div class="formrightcol"><?php echo select_tag('chapter', options_for_select($choptions), array(
			'include_blank' => true,
			))?></div>
	</div>
	<div class="evenRow">
		<div class="formleftcol">
			<div class="formleftcoltext">User type :</div>
		</div>
		<div class="formrightcol"><?php echo select_tag('usertype', options_for_select($useroptions, 1), array()) ?></div>
	</div>
	<div class="oddRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Location (city) :</div>
		</div>
		<div class="formrightcol"><input type="text" name="location"></div>
	</div>
	<div class="evenRow">
		<div class="formleftcol">
			<div class="formleftcoltext">Country :</div>
		</div>
		<div class="formrightcol"><?php echo select_tag('country', options_for_select($countryoptions, $countryselected), array()) ?></div>
	</div>
	<div class="oddRow">
		<div class="naturetitle">Nature of Work :</div>
	</div>
	<div class="evenRow">
		<div class="naturecheckbox">
		  <table border="0">
			    <tr>  
			    <?php $rt=0; foreach($worktype as $workt): $rt++; ?>
			    <?php if($rt==0): ?>
			    <tr>
			   <?php endif; ?> 
					<td width="20"><?php $rt++; echo checkbox_tag($workt->getId(),1,false); ?></td>
					<td><?php echo $workt->getName(); ?></td>
				<?php if($rt==8): $rt=0;?>
			    </tr>
				<?php endif; ?>
				<?php endforeach; ?>
				
			</table>
		</div>
	</div>
	<div class="vspacer20">&nbsp;</div>
	<div class="formbuttons"><input type="image" src="/images/search.png" alt="search"></div>
	<div class="vspacer10">&nbsp;</div>
</div>
</form>