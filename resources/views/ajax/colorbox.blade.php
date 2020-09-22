 @foreach ($colorsData as $key_ColorsData => $value_ColorsData)
                                                   
                                                      <label class="container">
                                                        <input type="checkbox" name="type" value="{{$value_ColorsData->id}}">
                                                        <span  class="checkmark" style="background-color: {{$value_ColorsData->hex_code}};cursor: pointer;"></span>
                                                      </label>
                                                    @endforeach