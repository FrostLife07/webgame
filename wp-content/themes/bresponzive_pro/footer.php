 </div><!--/#blocks-wrapper--> </div> <!--/#Wrapper-container --> </div> <!--/#Wrapper --><?php global $data; if($data['shw_footer_widg'] == 'yes'){ ?><!--#footer-blocks--><div id="footer-blocks" class="container clearfix"> 	<div class="row fb-container clearfix">		<div class="col-sm-3 footer-block1">                    <h4>Website</h4>                    <ul class="list-unstyled">                        <li><a href="#"><?php echo __('Điều khoản', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Chính sách', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Bản quyền', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Thông tin', 'iz_theme') ?></a></li>                    </ul> 		</div>				 		 		<div class="col-sm-3 footer-block2">                    <h4><?php echo __('Tài khoản', 'iz_theme'); ?></h4>                    <ul class="list-unstyled">                        <li><a href="#"><?php echo __('Đăng nhập', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Tạo tài khoản', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Bảo mật', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Điểm thưởng', 'iz_theme') ?></a></li>                    </ul>		</div>                            <div class="col-sm-3 footer-block3">                    <h4><?php echo __('Hỗ trợ', 'iz_theme'); ?></h4>                    <ul class="list-unstyled">                        <li><a href="#"><?php echo __('Góp ý', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Hỗ trợ tài khoản', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Chống hack', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Khiếu nại', 'iz_theme') ?></a></li>                    </ul>   		</div>            <div class="col-sm-3 footer-block4">                    <h4><?php echo __('Hỗ trợ', 'iz_theme'); ?></h4>                    <ul class="list-unstyled">                        <li><a href="#"><?php echo __('Góp ý', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Hỗ trợ tài khoản', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Chống hack', 'iz_theme') ?></a></li>                        <li><a href="#"><?php echo __('Khiếu nại', 'iz_theme') ?></a></li>                    </ul>   		</div>     </div> 			</div><!--/#footer-blocks--><?php } ?>  <!-- #footer--> <div id="footer" class="container clearfix">  <div class="foot-wrap container">  	  <p class="copyright"><?php echo bloginfo( 'name' ); ?>&nbsp; &copy;&nbsp;<?php echo date("Y");?></p>	 <?php $fo_crd = trim($data['cus_footer_text']);  if(empty($fo_crd)){ ?> <p class="credit">Designed by <a title="ThemePacific" href="http://iziweb.vn">Iziweb.vn</a></p><?php } else { ?> <p class="credit"><?php echo $data['cus_footer_text'];?> </p> <?php } ?>  </div></div><!--/#Footer --> <?php if($data['google_analytics']) { ?><?php echo $data['google_analytics'];?>  	<?php } ?>   <?php wp_footer(); ?> </body> </html>