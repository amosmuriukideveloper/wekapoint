<x-app-layout>
    <style>
        legend {
        background-color: #4fbde9;
        color: #fff;
        font-size: 12px;
        padding: 3px 6px;
        border-radius: 10px;
      }
      fieldset {
        border: 1px solid #ccc;
        padding: 10px;
        }

    .input-card{
        border:1px solid #348cd4;
        border-radius:10px;
    }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Team Registration</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.store') }}">
                            @csrf

                            <!-- Team Name -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Team Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Team Members -->
                            <div class="form-group">
                                <label for="team_members">Team Members</label>
                                <div id="team_members">
                                    <div class="team-member">
                                        <input type="text" name="team_members[]" class="form-control" placeholder="Member Name">
                                        <input type="text" name="team_members[]" class="form-control" placeholder="Member Age">
                                    </div>
                                </div>
                                <button type="button" id="add_team_member" class="btn btn-secondary">Add Team Member</button>
                            </div>

                            <!-- JavaScript to Add Team Members Dynamically -->
                            <script>
                                document.getElementById('add_team_member').addEventListener('click', function () {
                                    const teamMembers = document.getElementById('team_members');
                                    const teamMember = document.createElement('div');
                                    teamMember.className = 'team-member';
                                    teamMember.innerHTML = `
                                        <input type="text" name="team_members[]" class="form-control" placeholder="Member Name">
                                        <input type="text" name="team_members[]" class="form-control" placeholder="Member Age">
                                    `;
                                    teamMembers.appendChild(teamMember);
                                });
                            </script>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
