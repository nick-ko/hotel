<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{url('/dashboard/booking')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">RESERVATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Réserver votre chambre</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="control-label mb-1">Date d'arriver</label>
                                <div  id='datetimepicker11'>
                                    <input type='date' name="book_from" class="form-control" placeholder="Date d'arriver"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adult" class="control-label mb-1">Adulte</label>
                                <select class="form-control" id="adult" name="adult_number">
                                    <option data-display="Adulte">Adulte</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">+3</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="price" class="control-label mb-1">Date de depart</label>
                                <div  id='datetimepicker1'>
                                    <input type='date' name="book_to" class="form-control" placeholder="Date de depart"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="child" class="control-label mb-1">Enfant</label>
                                <select class="form-control" id="child" name="child_number">
                                    <option data-display="Enfant">Enfant</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Continuer</button>
                </div>
            </div>
        </form>
    </div>
</div>
