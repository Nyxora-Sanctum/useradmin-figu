@extends('admin-pages.layouts.vertical', ['subtitle' => 'Account Management'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Management', 'subtitle' => 'AI Config'])

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
            <div class="card-header">
                <h5 class="card-title">AI Configuration</h5>
            </div>
            <div class="card-body">
                <form id="aiConfigForm">
                    <div class="mb-3">
                        <label class="form-label">AI Model</label>
                        <input type="text" class="form-control" name="ai_model">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">API Key</label>
                        <input type="text" class="form-control" name="ai_api_key">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">API Endpoint</label>
                        <input type="text" class="form-control" name="ai_endpoint">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Output Format (JSON)</label>
                        <textarea class="form-control json-input" name="ai_output_format" rows="5"></textarea>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Supported Languages (JSON)</label>
                        <textarea class="form-control json-input" name="ai_supported_language" rows="2"></textarea>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">System Messages (JSON)</label>
                        <textarea class="form-control json-input" name="ai_system_messages" rows="2"></textarea>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Max Tokens</label>
                        <input type="number" class="form-control" name="max_tokens">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Temperature</label>
                        <input type="number" step="0.1" class="form-control" name="temperature">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Frequency Penalty</label>
                        <input type="number" step="0.1" class="form-control" name="frequency_penalty">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Presence Penalty</label>
                        <input type="number" step="0.1" class="form-control" name="presence_penalty">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Best Of</label>
                        <input type="number" class="form-control" name="best_of">
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Top P</label>
                        <input type="number" step="0.01" class="form-control" name="top_p">
                    </div>
            
                    <button type="button" class="btn btn-primary" onclick="updatePreview()">Save Configuration</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Preview</h5>
                <p class="text-muted mb-0">
                
            </div>
            <div class="card-body">
                <div class="card">
                    <pre id="randomPreview"></pre>
                </div>
                <div class="card">
                    <pre id="jsonPreview"></pre>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
@endsection

@vite(['resources/js/admin-pages/config.js'])
@endsection