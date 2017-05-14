/**
 * Created by niuzz on 2015/7/10 0010.
 */
function randPassword(length)
{
    var chars = "abcdefghijkmnpqrstuvwxyz1234567890";
    var pw="";
    for(var x=0; x<length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pw += chars.charAt(i);
    }

    return pw;
}


