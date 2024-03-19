@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Product Units Of Measures</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_units_of_measures.product_units_of_measure.create') }}" class="btn btn-success" title="Create New Product Units Of Measure">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productUnitsOfMeasures) == 0)
            <div class="panel-body text-center">
                <h4>No Product Units Of Measures Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Abbreviation</th>
                            <th>Is Predefined</th>
                            <th>Name</th>
                            <th>Sort Order</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productUnitsOfMeasures as $productUnitsOfMeasure)
                        <tr>
                            <td>{{ $productUnitsOfMeasure->abbreviation }}</td>
                            <td>{{ $productUnitsOfMeasure->is_predefined }}</td>
                            <td>{{ $productUnitsOfMeasure->name }}</td>
                            <td>{{ $productUnitsOfMeasure->sort_order }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_units_of_measures.product_units_of_measure.destroy', $productUnitsOfMeasure->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_units_of_measures.product_units_of_measure.show', $productUnitsOfMeasure->id ) }}" class="btn btn-info" title="Show Product Units Of Measure">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_units_of_measures.product_units_of_measure.edit', $productUnitsOfMeasure->id ) }}" class="btn btn-primary" title="Edit Product Units Of Measure">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Units Of Measure" onclick="return confirm(&quot;Click Ok to delete Product Units Of Measure.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $productUnitsOfMeasures->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection