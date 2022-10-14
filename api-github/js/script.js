let form = document.getElementById('form');
let username = document.getElementById('username');
let info = document.querySelector('.info .container');
form.addEventListener('submit', function (e) {
    e.preventDefault();
    let usernameValue = username.value.trim();

    axios.get(`https://api.github.com/users/${usernameValue}`).then(resp => {
        // console.log(resp.data.avatar_url);
        let obj = resp.data;
        console.log(obj);
        let header_info = ` <div class="header-info">
                        <div class="image">
                        <img src="${obj.avatar_url}" alt="">
                        </div>
                        <div class="info-user">
                            <h2>${obj.login}</h2>

                            <div class="info-following">
                                <div class="repositeries">
                                    <span>${obj.public_repos}</span>
                                    <span>Repositeries</span>
                                </div>
                                <div class="following">
                                    <span>${obj.following}</span>
                                    <span>Following</span>
                                </div>
                                <div class="followers">
                                    <span>${obj.followers}</span>
                                    <span>Followers</span>
                                </div>
                            </div>
                            <h3>${obj.name || ' '}</h3>
                            <p>${obj.location || ' '}</p>
                        </div>
                        </div>
                        `;
        info.innerHTML = header_info;

    });

    axios.get(`https://api.github.com/users/${usernameValue}/repos`).then(resp => {
        // console.log(resp.data.avatar_url);
        let repos = resp.data;
        let box = `<div class="repositries">
                    <h2>Popular repositories</h2>
                    <ul>
                    </ul>
                </div>`;
        info.innerHTML += box;
        let allRepositries = document.querySelector('.repositries ul');
        repos.forEach(repositry => {
            let repositeries = `
                 <li><a href="${repositry.html_url}">${repositry.name}</a></li>
             `;

             allRepositries.innerHTML += repositeries;
        });
        


        // info.innerHTML += repositeries;

    });
})