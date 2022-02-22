<div class="x_content">
    <form action="/admin/track" method="get" class="form-horizontal form-label-left input_mask js-form-track-resi-home">
        <div class="col-md-7 col-sm-10 col-xs-9 col-md-offset-2">
            <input type="text" name="resi" value="{{request('resi')}}"
                   class="form-control has-feedback-left form-validation js-track-resi-field"
                   data-message-required="Anda belum memasukkan nomor resi. Masukkan no resi anda"
                   id="inputSuccess2" placeholder="No Resi">
            <span class="fa fa-truck fas fa-shipping-fast form-control-feedback left" style="color: #3379b7;" aria-hidden="true"></span>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 form-group has-feedback">
            <button class="btn btn-primary js-track-resi-btn" type="submit">Lacak</button>
        </div>
    </form>
</div>
