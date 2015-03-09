<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('layout/general_css'); ?>
  </head>
  <body style="background-color: #4D4D4D">

  <div class="row" style="margin-top:30px">
    <div class="col-md-6 col-md-offset-3">

      <div class="panel" style="border-radius:0px;border-color:#C90000">
        <div class="panel-heading red" style="border-radius:0px;">
          <h3 class="panel-title">Selamat Datang</h3>
        </div>
        <div class="panel-body">

        <div style="text-align:center">
          <h1><?php echo lang('login_heading');?></h1>
          <p><?php echo lang('login_subheading');?></p>
        </div>

          <div id="infoMessage"><?php echo $message;?></div>

          <?php $attributes = array('class' => 'form-horizontal');?>
          <?php echo form_open("auth/login", $attributes);?>

            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo lang('login_identity_label', 'identity');?></label>
                <div class="col-md-9">
                    <?php
                    $attr = array(
                      'name'         => 'identity',
                      'class'        => 'form-control'
                    );
                    echo form_input($attr);?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo lang('login_password_label', 'password');?></label>
                <div class="col-md-9"><?php
                    $attr2 = array(
                      'name'         => 'password',
                      'class'        => 'form-control',
                      'type'         => 'password'
                    );
                    ?>
                    <?php echo form_input($attr2);
                    $attr_submit = array(
                      'class' => 'btn red btn-lg',
                      'name'  => 'submit',
                      'value' => 'Login'
                      );
                    ?>
                </div>
            </div>

            <div class="form-group">
              <div class="col-md-offset-3 col-md-9">
                <?php echo form_submit($attr_submit);?>
              </div>
            </div>

          <?php echo form_close();?>
        </div>
      </div>

    </div>
  </div>

    <?php $this->load->view('layout/general_js'); ?>
  </body>
</html>