 @foreach ($sizeData as $keySizeData => $valueSizeData)
                                          <label class="container">{{$valueSizeData->name}}
                                            <input type="checkbox" name="type" value="{{$valueSizeData->id}}">
                                            <span class="checkmark" style="cursor: pointer;"></span>
                                          </label>
                                        @endforeach