<select class="form-control col-sm-3 show-report-form__select" name="month">    
  <option value="0">-- Month --</option>
  @include('admin.abusers.partials.months', ['months' => $months])
</select>

<input class="btn btn-primary" type="submit" value="Show report">
