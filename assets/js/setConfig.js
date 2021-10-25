async function setGeneralConfig(o) {
    $("title").text(o.pageName);
    var b64Logo = await getImage('config', o.logo);
    $("#logo").attr('src', b64Logo).attr("alt", o.pageName).removeClass('loading');
    var t = "";
    t += `--background: url('${await getImage('config', o.background)}');`, 
    t += `--font: ${o.font};`,
    $("#generalConfig").html(`:root {${t}}`);
}

function setEspecificConfig(o) {
    var i = "";
    for(const n in o)
        for(const c in o[n])
            if("object" == typeof o[n][c]){
                const f = o[n][c];
                for(const o in f)
                    i += `--${c}-${o}: ${f[o]};`
            } else {
                i += `--${n}-${c}: ${o[n][c]};`
            }
    $("#especificConfig").html(`:root {${i}}`);
}