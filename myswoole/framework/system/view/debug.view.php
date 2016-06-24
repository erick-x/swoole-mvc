<!-- FrameWork Debug -->
<style>
.debugcontain {width: 800px;}
.debugblock {font-size: 12px; color: blue; text-align: left; padding: 10px; width: 100%;}
</style>

<center>
<div class="debugcontain">
<fieldset class="debugblock">
<legend>性能消耗</legend>
<?php echo Debug::debug_wrap_time(); ?>
</fieldset>

<fieldset class="debugblock">
<legend>资源状态</legend>
<p></p>
</fieldset>

</div>
</center>
